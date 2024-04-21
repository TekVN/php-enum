<?php

it('Get instance like a function', function () {
    $status = EnumUnit::active();

    expect($status)->toBeInstanceOf(EnumUnit::class)
        ->and($status)->toBeInstanceOf(EnumUnit::class)
        ->and(EnumUnit::hasValue($status))->toBeFalse();
});

it('Throw exception if method not exists', function () {
    EnumUnit::methodNotExists();
})->throws(BadMethodCallException::class);

it('Get value of enum', function () {
    $value = EnumUnit::getValue(EnumUnit::USER_SUSPENDED);
    expect($value)->toBeString()->toBe(EnumUnit::USER_SUSPENDED->name);


    $value = EnumUnit::getValue('USER_SUSPENDED');
    expect($value)->toBe(EnumUnit::USER_SUSPENDED->name);

    $value = EnumUnit::getValue('NAME_NOT_EXISTS');
    expect($value)->toBeNull();
});

it('Get array of enum', function () {
    $array = EnumUnit::toArray();
    expect($array)->toBeArray()
        ->and($array)->toHaveLength(count(EnumUnit::cases()))
        ->and($array)->toMatchArray([
            EnumUnit::USER_SUSPENDED->name => EnumUnit::USER_SUSPENDED->name,
            EnumUnit::ACTIVE->name => EnumUnit::ACTIVE->name,
        ]);
});

it('Get json of enum', function () {
    $json = EnumUnit::toJson();
    expect($json)->toBeJson();
});
