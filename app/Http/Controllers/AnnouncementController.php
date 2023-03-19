<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Http\Resources\AnnouncementsResource;
use App\Models\Announcements;
use App\Models\User;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function anouncementPage()
    {
//      Get the announcements order by the created_at field
        $announcements = Announcements::orderByDesc('created_at')->get();

//      Modify the data
        $announcements = AnnouncementsResource::collection($announcements);

//      Get the user id from the session
        $userId = session('user_id');

//      By default, the admin is false expect if the user is admin to the next step
        $admin = false;

//      Check if the userId exists
        if ($userId) {
//          Get user if the userId exists
            $admin = $this->userIsAdmin($userId);
        }

//      Return the page with the data
        return view('announcements', [
            'announcements' => $announcements,
            'admin' => $admin
        ]);
    }

    public function importAnnouncement(AnnouncementRequest $request)
    {
        // Validate the data
        $validated = $request->validated();

        // If everything is good it will continue to save the announcement otherwise return the errors to the page
        Announcements::create([
            'title'=> $validated['title'],
            'content'=> $validated['content'],
        ]);

        //  Return success response
        return redirect()->route('announcements')->with([
            'type' => 'success',
            'message' => 'Η ανακοίνωση έχει καταχωρηθεί επιτυχώς!'
        ]);
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Get the announcement id from the request
        $announcementId = $request->input('announcement_id');

        // Delete the announcement with the given id
        Announcements::where('id', $announcementId)->delete();

        // Redirect to the announcements index page
        return redirect()->route('announcements')->with([
            'type' => 'success',
            'message' => 'Η ανακοίνωση έχει διαγραφή επιτυχώς!'
        ]);
    }

    private function userIsAdmin($userId)
    {
//      Find the user
        $user = User::find($userId);

//      Return if user is admin
        return $user->isAdmin();
    }
}
