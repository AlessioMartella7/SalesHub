<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Organizzazione;
use App\Models\Vendita;
use Illuminate\Auth\Access\Response;

class VenditaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vendita $vendita): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vendita $vendita): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vendita $vendita): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vendita $vendita): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vendita $vendita): bool
    {
        return false;
    }

    public function annulla(Organizzazione $organizzazione, Vendita $vendita) : bool
    {
        return $organizzazione->id === $vendita->organizzazione_id;
    }
}