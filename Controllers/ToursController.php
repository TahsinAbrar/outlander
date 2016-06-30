<?php

use Models\Tour;

class ToursController extends Controller
{

  protected $tour;

  public function __construct(Tour $tour)
  {
    $this->tour = $tour;
  }

  public function index()
  {
    return $this->tour->all();
  }
}

?>
