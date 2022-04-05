<?php

class Car
{
    private string $name;
    private DateTime $date;
    private string $color;
    private int $power;

    public function __construct(string $name, DateTime $date, string $color, int $power)
    {
        $this->name = $name;
        $this->date = $date;
        $this->color = $color;
        $this->power = $power;
    }

    public function getData()
    {
        return [
            $this->name,
            date_format($this->date, '%Y'),
            $this->color,
            $this->power,
        ];
    }
}

interface ConverterInterface
{
    public function __construct(string $fileName);
    public function convert(array $data);
    public function getFileName();
}

class JsonConverter implements ConverterInterface
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function convert(array $data)
    {
        return json_encode($data);
    }

    public function getFileName()
    {
        return $this->fileName;
    }
}

class CsvConverter implements ConverterInterface
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function convert(array $data)
    {
        return implode(',', $data);
    }

    public function getFileName()
    {
        return $this->fileName;
    }
}

class FileProcessing
{
    private Car $car;
    private ConverterInterface $converter;

    public function __construct(Car $car, ConverterInterface $converter)
    {
        $this->car = $car;
        $this->converter = $converter;
    }

    public function saveToFile(): string
    {
        $filename = $this->converter->getFileName();

        $file = fopen($filename, 'w');

        if (fwrite($file, $this->converter->convert($this->car->getData())) == false) {
            return 'Not success';
        }

        fclose($file);

        return 'Success';
    }
}
$car = new Car('Audi', new DateTime('2020-01-01'), 'Raudona', 140);

$status = (new FileProcessing($car, new JsonConverter('car_new.json')))->saveToFile();

var_dump($status);