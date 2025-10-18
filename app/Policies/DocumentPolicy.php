<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Document;

class DocumentPolicy
{
    public function view(User $user, Document $document)
    {
        return $user->id === $document->application->user_id || $user->isAdmin();
    }

    public function delete(User $user, Document $document)
    {
        return $user->id === $document->application->user_id;
    }
}