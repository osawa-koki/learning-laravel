<?php

namespace App\Services;

use App\Models\Food;
use Illuminate\Http\Request;

enum OrderBy
{
    case Id;
    case Name;
    case Description;
}

enum Order
{
    case Asc;
    case Desc;
}

class FoodService
{
    private int $page = 1;

    private OrderBy $orderBy = OrderBy::Id;

    private Order $order = Order::Asc;

    private ?string $name = null;

    private ?string $description = null;

    private ?int $prefectureId = null;

    public function __construct(Request $request)
    {
        if ($request->page) {
            $this->page = $request->page;
        }
        if ($request->orderBy) {
            $this->orderBy = match ($request->orderBy) {
                'name' => OrderBy::Name,
                'description' => OrderBy::Description,
                default => OrderBy::Id,
            };
        }
        if ($request->order) {
            $this->order = match ($request->order) {
                'asc' => Order::Asc,
                'desc' => Order::Desc,
                default => Order::Asc,
            };
        }
        if ($request->name) {
            $this->name = $request->name;
        }
        if ($request->description) {
            $this->description = $request->description;
        }
        if ($request->prefecture_id) {
            $this->prefectureId = $request->prefecture_id;
        }
    }

    public function getServiceParams()
    {
        return [
            'page' => $this->page,
            'name' => $this->name,
            'description' => $this->description,
            'prefecture_id' => $this->prefectureId,
        ];
    }

    public function search()
    {
        $foods = $this->buildQuery()->with('prefecture')->orderBy($this->getOrderBy(), $this->getOrder())->get()->toArray();
        $perPage = config('app.pagination.per_page');
        $offset = ($this->page - 1) * $perPage;
        $totalCount = count($foods);
        $totalPages = ceil($totalCount / $perPage);
        $currentPage = $this->page;

        $foods = array_slice($foods, $offset, $perPage);

        return [
            'foods' => $foods,
            'pagination' => [
                'totalCount' => $totalCount,
                'totalPages' => $totalPages,
                'currentPage' => $currentPage,
                'perPage' => $perPage,
            ],
        ];
    }

    private function getOrderBy()
    {
        switch ($this->orderBy) {
            case OrderBy::Id:
                return 'id';
            case OrderBy::Name:
                return 'name';
            case OrderBy::Description:
                return 'description';
        }
    }

    private function getOrder()
    {
        switch ($this->order) {
            case Order::Asc:
                return 'asc';
            case Order::Desc:
                return 'desc';
        }
    }

    private function buildQuery()
    {
        $query = Food::query();

        if ($this->name) {
            $query->where('name', 'LIKE', "%{$this->name}%");
        }

        if ($this->description) {
            $query->where('description', 'LIKE', "%{$this->description}%");
        }

        return $query;
    }
}
