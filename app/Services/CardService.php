<?php


namespace App\Services;

use App\Models\Card;
use App\Models\User;
use App\Repositories\Eloquent\CardRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CardService extends BaseModelService
{

    /**
    * @var CardRepository $repository
    */
    private CardRepository $repository;

    protected function getModelRepository(): string
    {
        return CardRepository::class;
    }

    public function loadMyCards(Model $user, string $sortRule = "DESC"): Collection
    {
        return $user->cards()->orderBy('created_at', $sortRule)->get();
    }

    public function storeCard(User $user, array $data): Model
    {
        return $user->cards()->create($data);
    }

    public function showCard(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function updateCard(User $user, int $id, array $data) {
        /** @var Card $foundCard */
        $foundCard = $user->cards()->findOrFail($id);
        $foundCard->update($data);
        return $foundCard->refresh();
    }

    public function deleteCard(User $user, int $id): void
    {
        $user->cards()->findOrFail($id)->delete();
    }
}
