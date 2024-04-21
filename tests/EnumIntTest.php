<?php

it('Get instance like a function', function () {
    $status = EnumInt::active();

    expect($status)->toBeInstanceOf(EnumInt::class)
        ->and($status)->toBeInstanceOf(BackedEnum::class)
        ->and(EnumInt::hasValue($status))->toBeTrue();
});

it('Throw exception if method not exists', function () {
    EnumInt::methodNotExists();
})->throws(BadMethodCallException::class);

it('Get value of enum', function () {
    $value = EnumInt::getValue(EnumInt::USER_SUSPENDED);
    expect($value)->toBeInt()->toBe(EnumInt::USER_SUSPENDED->value);


    $value = EnumInt::getValue('USER_SUSPENDED');
    expect($value)->toBe(EnumInt::USER_SUSPENDED->value);

    $value = EnumInt::getValue('NAME_NOT_EXISTS');
    expect($value)->toBeNull();
});

it('Get array of enum', function () {
    $array = EnumInt::toArray();
    expect($array)->toBeArray()
        ->and($array)->toHaveLength(count(EnumInt::cases()))
        ->and($array)->toMatchArray([
            EnumInt::USER_SUSPENDED->name => EnumInt::USER_SUSPENDED->value,
            EnumInt::ACTIVE->name => EnumInt::ACTIVE->value,
        ]);
});

it('Get json of enum', function () {
    $json = EnumInt::toJson();
    expect($json)->toBeJson();
});
