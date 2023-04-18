<?php

declare(strict_types=1);

namespace App\GraphQL\Validators\Claim;

use Nuwave\Lighthouse\Validation\Validator;

final class EditClaimValidator extends Validator
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'int', 'exists:App\Claim\Entity\Claim,id'],
            'name' => ['required', 'string', 'max: 255'],
            'number' => ['required', 'string', 'max: 255'],
            'files' => ['array'],
            'files.*' => ['required', 'file'],
        ];
    }
}
