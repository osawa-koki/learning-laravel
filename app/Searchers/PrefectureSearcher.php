<?php

namespace App\Searchers;

use App\Models\Prefecture;
use Illuminate\Http\Request;

class PrefectureSearcher
{
    private $name;

    private $capital;

    private $description;

    private $populationMin;

    private $populationMax;

    private $areaMin;

    private $areaMax;

    private $populationDensityMin;

    private $populationDensityMax;

    private $visited;

    private $active = true;

    public function __construct(Request $request)
    {
        $this->name = $request->name;
        $this->capital = $request->capital;
        $this->description = $request->description;
        $this->populationMin = $request->populationMin;
        $this->populationMax = $request->populationMax;
        $this->areaMin = $request->areaMin;
        $this->areaMax = $request->areaMax;
        $this->populationDensityMin = $request->populationDensityMin;
        $this->populationDensityMax = $request->populationDensityMax;
        $this->visited = $request->visited;
    }

    public function getSearchParams() {
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
        return $this->buildQuery()->get();
    }

    private function buildQuery()
    {
        $query = Prefecture::query();

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
            $query->where('(population / area)', '>=', $this->populationDensityMin);
        }

        if ($this->populationDensityMax) {
            $query->where('(population / area)', '<=', $this->populationDensityMax);
        }

        if ($this->visited) {
            $query->where('visited', $this->visited);
        }

        return $query;
    }
}
