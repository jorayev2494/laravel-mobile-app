<?php


namespace App\Services;

use App\Models\Card;
use App\Models\User;
use App\Repositories\Eloquent\CardRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CardService extends BaseModelService
{

    /**
    * @var CardRepository $repository
    */
    private CardRepository $repository;

    public function __construct(CardRepository $repository = null) {
        $this->repository = $repository;
        parent::__construct(app());
    }

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
        return $user->cards()->create($this->parseDate($data));
    }

    public function showCard(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function updateCard(User $user, int $id, array $data) {
        /** @var Card $foundCard */
        $foundCard = $user->cards()->findOrFail($id);
        $foundCard->update($this->parseDate($data));
        return $foundCard->refresh();
    }

    public function deleteCard(User $user, int $id): void
    {
        $user->cards()->findOrFail($id)->delete();
    }

    private function parseDate(array $data): array
    {
        if (array_key_exists('expires_end', $data)) {
            $data['expires_end'] = Carbon::parse($data['expires_end']);
        }

        return $data;
    }
}
