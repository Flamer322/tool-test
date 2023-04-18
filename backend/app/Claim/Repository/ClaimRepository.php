<?php

namespace App\Claim\Repository;

use App\Claim\Entity\Claim;
use DomainException;

final class ClaimRepository
{
    public function get(int $id): Claim
    {
        return Claim::where(['id' => $id])->firstOrFail();
    }

    public function save(Claim $claim): void
    {
        if (!$claim->save()) {
            throw new DomainException('Возникла ошибка при сохранении заявления');
        }
    }

    public function delete(Claim $claim): void
    {
        if (!$claim->delete()) {
            throw new DomainException('Возникла ошибка при удалении заявления');
        }
    }

    public function findById(int $claimId): ?Claim
    {
        if (!$claim = Claim::whereId($claimId)->first()) {
            throw new DomainException('Заявление не найден');
        }

        return $claim;
    }
}
