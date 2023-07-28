<?php

namespace App\Services;

use App\Models\Prefecture;
use Illuminate\Http\Request;

enum OrderBy
{
    case Id;
    case Name;
    case Capital;
    case Population;
    case Area;
    case PopulationDensity;
}

enum Order
{
    case Asc;
    case Desc;
}

class PrefectureService
{
    private int $page = 1;

    private OrderBy $orderBy = OrderBy::Id;

    private Order $order = Order::Asc;

    private ?string $name = null;

    private ?string $capital = null;

    private ?string $description = null;

    private int $populationMin = 0;

    private int $populationMax = 10_000_000;

    private int $areaMin = 0;

    private int $areaMax = 100_000;

    private int $populationDensityMin = 0;

    private $populationDensityMax = 10_000;

    private ?bool $visited = null;

    private $active = true;

    public function __construct(Request $request)
    {
        if ($request->page) {
            $this->page = $request->page;
        }
        if ($request->orderBy) {
            $this->orderBy = match ($request->orderBy) {
                'name' => OrderBy::Name,
                'capital' => OrderBy::Capital,
                'population' => OrderBy::Population,
                'area' => OrderBy::Area,
                'population_density' => OrderBy::PopulationDensity,
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
        if ($request->capital) {
            $this->capital = $request->capital;
        }
        if ($request->description) {
            $this->description = $request->description;
        }
        if ($request->populationMin) {
            $this->populationMin = $request->populationMin;
        }
        if ($request->populationMax) {
            $this->populationMax = $request->populationMax;
        }
        if ($request->areaMin) {
            $this->areaMin = $request->areaMin;
        }
        if ($request->areaMax) {
            $this->areaMax = $request->areaMax;
        }
        if ($request->populationDensityMin) {
            $this->populationDensityMin = $request->populationDensityMin;
        }
        if ($request->populationDensityMax) {
            $this->populationDensityMax = $request->populationDensityMax;
        }
        switch ($request->visited) {
            case '0':
                $this->visited = false;
                break;
            case '1':
                $this->visited = true;
                break;
            default:
                $this->visited = null;
                break;
        }
    }

    public function getServiceParams()
    {
        return [
            'name' => $this->name,
            'capital' => $this->capital,
            'description' => $this->description,
            'populationMin' => $this->populationMin,
            'populationMax' => $this->populationMax,
            'areaMin' => $this->areaMin,
            'areaMax' => $this->areaMax,
            'populationDensityMin' => $this->populationDensityMin,
            'populationDensityMax' => $this->populationDensityMax,
            'visited' => $this->visited,
        ];
    }

    public function search()
    {
        $prefectures = $this->buildQuery()->orderBy($this->getOrderBy(), $this->getOrder())->get()->toArray();
        $perPage = config('app.pagination.per_page');
        $offset = ($this->page - 1) * $perPage;
        $totalCount = count($prefectures);
        $totalPages = ceil($totalCount / $perPage);
        $currentPage = $this->page;

        $prefectures = array_slice($prefectures, $offset, $perPage);

        return [
            'prefectures' => $prefectures,
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
            case OrderBy::Capital:
                return 'capital';
            case OrderBy::Population:
                return 'population';
            case OrderBy::Area:
                return 'area';
            case OrderBy::PopulationDensity:
                return 'population_density';
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
        $query = Prefecture::query();
        $query->selectRaw('*, (population / area) as population_density');

        if ($this->name) {
            $query->where('name', 'LIKE', "%{$this->name}%");
        }

        if ($this->capital) {
            $query->where('capital', 'LIKE', "%{$this->capital}%");
        }

        if ($this->description) {
            $query->where('description', 'LIKE', "%{$this->description}%");
        }

        if ($this->populationMin) {
            $query->where('population', '>=', $this->populationMin);
        }

        if ($this->populationMax) {
            $query->where('population', '<=', $this->populationMax);
        }

        if ($this->areaMin) {
            $query->where('area', '>=', $this->areaMin);
        }

        if ($this->areaMax) {
            $query->where('area', '<=', $this->areaMax);
        }

        if ($this->populationDensityMin) {
            $query->where('population_density', '>=', $this->populationDensityMin);
        }

        if ($this->populationDensityMax) {
            $query->where('population_density', '<=', $this->populationDensityMax);
        }

        if ($this->visited !== null) {
            $query->where('visited', $this->visited);
        }

        return $query;
    }
}
