<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;

/**
 * FollowerController
 *
 * Controller responsible for managing followers (adepts) in the cult.
 * Handles CRUD operations (Create, Read, Update, Delete) for followers,
 * ensuring that each leader can only manage their own followers.
 *
 * @package App\Http\Controllers
 */
class FollowerController extends Controller
{
    /**
     * Displays a list of all followers for the authenticated leader.
     *
     * @param Request $request The HTTP request containing authenticated user information
     * @return \Illuminate\View\View View with the list of followers
     */
    public function index(Request $request)
    {
        $followers = $request->user()->followers;
        return view('followers.index', compact('followers'));
    }

    /**
     * Displays the form to create a new follower.
     *
     * @return \Illuminate\View\View The creation form view
     */
    public function create()
    {
        return view('followers.create');
    }

    /**
     * Stores a new follower in the database after validating the data.
     *
     * Validates that the data meets the specified requirements and then creates
     * the new follower, automatically linking it to the authenticated user.
     *
     * @param Request $request The HTTP request with the form data
     * @return \Illuminate\Http\RedirectResponse Redirect to the followers list with success message
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string',
            'level' => 'required|integer|min:1|max:100',
            'loyalty_points' => 'required|integer|min:0|max:100',
            'is_elderly' => 'boolean',
            'joined_at' => 'required|date',
        ]);

        // The checkbox is not sent if unchecked, so we use has() to detect it
        $validated['is_elderly'] = $request->has('is_elderly');

        $request->user()->followers()->create($validated);

        return redirect()->route('followers.index')->with('success', 'Follower recruited successfully!');
    }

    /**
     * Displays the form to edit an existing follower.
     *
     * Verifies that the follower belongs to the authenticated user before allowing access.
     *
     * @param Request $request The HTTP request
     * @param Follower $follower The follower to edit
     * @return \Illuminate\View\View The edit form view
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException If the user is not the owner of the follower
     */
    public function edit(Request $request, Follower $follower)
    {
        // Security check: only the owner can edit their followers
        if ($follower->user_id !== $request->user()->id) {
            abort(403, 'You cannot edit followers from another cult.');
        }

        return view('followers.edit', compact('follower'));
    }

    /**
     * Updates the data of an existing follower in the database.
     *
     * Validates the provided data and updates the follower only if the current user
     * is the owner.
     *
     * @param Request $request The HTTP request with the updated data
     * @param Follower $follower The follower to update
     * @return \Illuminate\Http\RedirectResponse Redirect to the followers list with success message
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException If the user is not the owner of the follower
     */
    public function update(Request $request, Follower $follower)
    {
        // Security check: only the owner can update their followers
        if ($follower->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string',
            'level' => 'required|integer|min:1|max:100',
            'loyalty_points' => 'required|integer|min:0|max:100',
            'joined_at' => 'required|date',
        ]);

        // The checkbox is not sent if unchecked, so we use has() to detect it
        $validated['is_elderly'] = $request->has('is_elderly');

        $follower->update($validated);

        return redirect()->route('followers.index')->with('success', 'Follower statistics updated successfully!');
    }

    /**
     * Deletes a follower from the database.
     *
     * Only allows deletion if the authenticated user is the owner of the follower.
     *
     * @param Request $request The HTTP request
     * @param Follower $follower The follower to delete
     * @return \Illuminate\Http\RedirectResponse Redirect to the followers list
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException If the user is not the owner of the follower
     */
    public function destroy(Request $request, Follower $follower)
    {
        // Security check: only the owner can delete their followers
        if ($follower->user_id !== $request->user()->id) {
            abort(403);
        }

        $follower->delete();
        return redirect()->route('followers.index');
    }
}
