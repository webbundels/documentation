# Documentation

## Installation

1) Add the package to your project. 
```console
composer require webbundels/documentation
```

2) Migrate the database.
```console
php artisan migrate
```

## View permissions
1) Add the method 'getDocumentationViewableAttribute' to your user model.
2) Write logic in this method that determines if the user can view the documentation page.

```php
public function getDocumentationViewableAttribute() :boolean
{
    return $this->can('view_documentation');
}
```

## Edit permissions
1) Add the method 'getDocumentationEditableAttribute' to your user model.
2) Write logic in this method that determines if the user can edit the documentation page.

```php
public function getDocumentationEditableAttribute() :boolean
{
    return $this->can('edit_documentation');
}
```
