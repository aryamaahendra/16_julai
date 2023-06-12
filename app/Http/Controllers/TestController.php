<?php

namespace App\Http\Controllers;

use App\Actions\KNN;
use App\Enums\Kerusakan;
use App\Models\DataLatih;
use App\Models\DataUji;
use App\Utilities\Data;
use Illuminate\Http\Request;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\SVC;
use Phpml\DimensionReduction\PCA;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ClassificationReport;
use Phpml\SupportVectorMachine\Kernel;

class TestController extends Controller
{
    function index()
    {
        $dataset = collect([]);
        $class = collect([]);

        $allData = DataLatih::all();
        foreach ($allData as $data) {
            $temp = collect([]);
            foreach (Data::attributes() as $attr) {
                $temp->push(Kerusakan::toInt($data[$attr]));
            }

            $dataset->push($temp);
            $class->push($data->class);
        }

        $classifier = new SVC(Kernel::LINEAR, $cost = 5.5);
        $classifier->train($dataset->toArray(), $class->toArray());

        $actualLabels = collect([]);
        $predictedLabels = collect([]);
        $allData = DataUji::all();
        foreach ($allData as $data) {
            $temp = collect([]);
            foreach (Data::attributes() as $attr) {
                $temp->push(Kerusakan::toInt($data[$attr]));
            }

            $actualLabels->push($data->class);
            $predictedLabels->push($classifier->predict($temp->toArray()));
        }

        $report = Accuracy::score($actualLabels->toArray(), $predictedLabels->toArray());

        dd($report);
    }
}
