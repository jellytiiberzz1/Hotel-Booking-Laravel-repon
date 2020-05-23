<?php

namespace App\Policies;

use App\User;
use App\Bookings;
use Illuminate\Auth\Access\HandlesAuthorization;

class RevenuePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any bookings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the bookings.
     *
     * @param  \App\User  $user
     * @param  \App\Bookings  $bookings
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role == 1;
    }

    /**
     * Determine whether the user can create bookings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bookings.
     *
     * @param  \App\User  $user
     * @param  \App\Bookings  $bookings
     * @return mixed
     */
    public function update(User $user, Bookings $bookings)
    {
        //
    }

    /**
     * Determine whether the user can delete the bookings.
     *
     * @param  \App\User  $user
     * @param  \App\Bookings  $bookings
     * @return mixed
     */
    public function delete(User $user, Bookings $bookings)
    {
        //
    }

    /**
     * Determine whether the user can restore the bookings.
     *
     * @param  \App\User  $user
     * @param  \App\Bookings  $bookings
     * @return mixed
     */
    public function restore(User $user, Bookings $bookings)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bookings.
     *
     * @param  \App\User  $user
     * @param  \App\Bookings  $bookings
     * @return mixed
     */
    public function forceDelete(User $user, Bookings $bookings)
    {
        //
    }
}
