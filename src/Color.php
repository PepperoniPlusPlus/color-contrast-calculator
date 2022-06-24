<?php

namespace pepperoniplusplus\ColorContrastCalculator;

class Color
{
  /**
   * @var int
   */
  private $redValue;

  /**
   * @var int
   */
  private $greenValue;

  /**
   * @var int
   */
  private $blueValue;

  /**
   * @param int $red
   * @param  int  $green
   * @param int $blue
   */
  public function __construct(int $red, int $green, int $blue)
  {
    $this->redValue = $red;
    $this->greenValue = $green;
    $this->blueValue = $blue;
  }

  /**
   * @param $hex
   * @return Color
   */
  public static function fromHex($hex) : Color
  {
    list ($red, $green, $blue) = sscanf($hex, "#%02x%02x%02x");
    return new self($red, $green, $blue);
  }

  /**
   * @param $red
   * @param $green
   * @param $blue
   * @return Color
   */
  public static function fromRGB($red, $green, $blue) : Color
  {
    return new self($red, $green, $blue);
  }

  /**
   * @return int
   */
  public function getRedValue(): int
  {
    return $this->redValue;
  }

  /**
   * @param  int  $redValue
   */
  public function setRedValue(int $redValue): void
  {
    $this->redValue = $redValue;
  }

  /**
   * @return int
   */
  public function getGreenValue(): int
  {
    return $this->greenValue;
  }

  /**
   * @param  int  $greenValue
   */
  public function setGreenValue(int $greenValue): void
  {
    $this->greenValue = $greenValue;
  }

  /**
   * @return int
   */
  public function getBlueValue(): int
  {
    return $this->blueValue;
  }

  /**
   * @param  int  $blueValue
   */
  public function setBlueValue(int $blueValue): void
  {
    $this->blueValue = $blueValue;
  }

  /**
   * @return float
   */
  public function getBrightness() : float
  {
    return (0.299 * $this->getRedValue() + 0.587 * $this->getGreenValue() + 0.114 * $this->getBlueValue());
  }

  /**
   * @return float
   */
  public function getLuminosity() : float
  {
    return
      0.2126 * pow($this->getRedValue() / 255, 2.2) +
      0.7152 * pow($this->getGreenValue() / 255, 2.2) +
      0.0722 * pow($this->getBlueValue() / 255, 2.2);
  }
}