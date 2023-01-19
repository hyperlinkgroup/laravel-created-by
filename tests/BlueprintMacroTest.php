<?php

use Hyperlink\CreatedBy\CreatedByServiceProvider;
use Illuminate\Database\Schema\Blueprint;

foreach ([
    'createdBy' => 'created_by',
    'updatedBy' => 'updated_by',
    'deletedBy' => 'deleted_by',
    'restoredBy' => 'restored_by',
         ] as $functionName => $columnName) {
    it('can extend the blueprint for migrations - ' . $functionName, function () use ($functionName, $columnName) {
        app()->register(CreatedByServiceProvider::class);

        $blueprint = new Blueprint('test');
        $blueprint->$functionName();
        expect($blueprint->getAddedColumns())->toHaveCount(1);
        expect($blueprint->getAddedColumns()[0]->toArray())->toEqual([
            'type' => 'bigInteger',
            'name' => $columnName,
            'autoIncrement' => false,
            'unsigned' => true,
            'nullable' => true,
            'default' => null,
        ]);
    });
}

it('can extend the blueprint for migrations - restoredAt', function () {
    app()->register(CreatedByServiceProvider::class);

    $blueprint = new Blueprint('test');
    $blueprint->restoredAt();
    expect($blueprint->getAddedColumns())->toHaveCount(1);
    expect($blueprint->getAddedColumns()[0]->toArray())->toEqual([
        'type' => 'timestamp',
        'name' => 'restored_at',
        'precision' => 0,
        'nullable' => true,
        'default' => null,
    ]);
});
