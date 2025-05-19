<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')
            ->orderBy('full_name')
            ->get();

        return view('students.index', compact('students'), ['title' => 'Students']);
    }

    public function show(User $student)
    {
        if ($student->role !== 'student') {
            abort(404);
        }

        $sosmed = optional($student->sosmed);

        return view('students.show', compact('student', 'sosmed'), ['title' => $student->full_name]);
    }

    public function edit(User $student)
    {
        if ($student->role !== 'student' || auth()->id() !== $student->id) {
            abort(404);
        }

        $sosmed = optional($student->sosmed);

        return view('students.edit', compact('student', 'sosmed'), ['title' => 'Edit Profile']);
    }

    public function update(User $student, Request $request)
    {
        if ($student->role !== 'student' || auth()->id() !== $student->id) {
            abort(403, 'Unauthorized action');
        }

        $validated = $request->validate([
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'profile_pic' => 'nullable|image|max:2048',
            'whatsapp' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'reddit' => 'nullable|url',
            'x' => 'nullable|url',
            'discord' => 'nullable|url',
            'github' => 'nullable|url',
        ], [], [
            'whatsapp' => 'whatsapp',
            'instagram' => 'instagram',
            'tiktok' => 'tiktok',
            'linkedin' => 'linkedin',
            'facebook' => 'facebook',
            'youtube' => 'youtube',
            'reddit' => 'reddit',
            'x' => 'x',
            'discord' => 'discord',
            'github' => 'github',
        ]);

        // Initialize empty values for missing social media fields
        $validated = $validated + [
            'whatsapp' => null,
            'instagram' => null,
            'tiktok' => null,
            'linkedin' => null,
            'facebook' => null,
            'youtube' => null,
            'reddit' => null,
            'x' => null,
            'discord' => null,
            'github' => null,
        ];

        // Update user profile
        $student->update([
            'birthday' => $validated['birthday'],
            'phone' => $validated['phone'],
            'bio' => $validated['bio'],
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            if ($student->profile_pic && Storage::exists($student->profile_pic)) {
                Storage::delete($student->profile_pic);
            }
            $student->profile_pic = $request->file('profile_pic')->store('profile-pics', 'public');
            $student->save();
        }

        // Update or create social media links
        $sosmed = optional($student->sosmed) ?? new Sosmed();
        $sosmed->user_id = $student->id;
        $sosmed->whatsapp = optional($validated['whatsapp']);
        $sosmed->instagram = optional($validated['instagram']);
        $sosmed->tiktok = optional($validated['tiktok']);
        $sosmed->linkedin = optional($validated['linkedin']);
        $sosmed->facebook = optional($validated['facebook']);
        $sosmed->youtube = optional($validated['youtube']);
        $sosmed->reddit = optional($validated['reddit']);
        $sosmed->x = optional($validated['x']);
        $sosmed->discord = optional($validated['discord']);
        $sosmed->github = optional($validated['github']);
        $sosmed->save();

        return redirect()->route('students.show', $student)->with('success', 'Profile updated successfully');
    }
}
