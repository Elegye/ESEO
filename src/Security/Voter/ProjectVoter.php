<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class ProjectVoter extends Voter
{
    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['PROJECT_EDIT', 'PROJECT_VIEW', 'PROJECT_DELETE'])
            && $subject instanceof \App\Entity\Project;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // Le rôle Professeur et supérieur peut tout faire !
        if ($this->security->isGranted('ROLE_PROFESSEUR')) {
            return true;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'PROJECT_EDIT':
                $user === $subject->getUsers();
            case 'PROJECT_VIEW':
                return true;
            case 'PROJECT_DELETE':
                return true;
        }

        return false;
    }
}
