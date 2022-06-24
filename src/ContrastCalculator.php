<?php

namespace pepperoniplusplus\ColorContrastCalculator;

class ContrastCalculator
{
  /**
   * @var Color
   */
  private $firstColor;

  /**
   * @var Color
   */
  private $secondColor;

  /**
   * @param Color $firstColor
   * @param Color $secondColor
   */
  public function __construct(Color $firstColor, Color $secondColor)
  {
    $this->firstColor = $firstColor;
    $this->secondColor = $secondColor;
  }

  /**
   * @return int
   */
  public function getColorDifference() : int
  {
    return
      max($this->firstColor->getRedValue(), $this->secondColor->getRedValue()) - min($this->firstColor->getRedValue(), $this->secondColor->getRedValue())
      + max($this->firstColor->getGreenValue(), $this->secondColor->getGreenValue()) - min($this->firstColor->getGreenValue(), $this->secondColor->getGreenValue())
      + max($this->firstColor->getBlueValue(), $this->secondColor->getBlueValue()) - min($this->firstColor->getBlueValue(), $this->secondColor->getBlueValue());
  }

  /**
   * @return int|float
   */
  public function getBrightnessDifference()
  {
    return abs($this->firstColor->getBrightness() - $this->secondColor->getBrightness());
  }

  /**
   * @return int
   */
  public function getLuminosityContrast() : int
  {
    $firstColorLuminosity = $this->firstColor->getLuminosity();
    $secondColorLuminosity = $this->secondColor->getLuminosity();

    return
      $firstColorLuminosity > $secondColorLuminosity
      ? ($firstColorLuminosity + 0.05) / ($secondColorLuminosity / 0.05)
      : ($secondColorLuminosity + 0.05) / ($firstColorLuminosity / 0.05);
  }
}