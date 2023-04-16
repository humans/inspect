# Inspect — An easy way to access protected and private class properties.

Inspect is a fast way to pull protected anf private properties from objects.

## Installation

```bash
composer require humans/inspect --dev
```

### Usage

```php
function it_should_have_a_value_of_x () {
  $object = new class {
  	private string $value = 'x';  
  };
  
  $this->assertEquals('x', inspect($object)->value);
}
```



