<?php

it('Get instance like a function', function () {
    $status = EnumString::active();

    expect($status)->toBeInstanceOf(EnumString::class)
        ->and($status)->toBeInstanceOf(BackedEnum::class)
        ->and(EnumString::hasValue($status))->toBeTrue();
});

it('Throw exception if method not exists', function () {
    EnumString::methodNotExists();
})->throws(BadMethodCallException::class);

it('Get value of enum', function () {
    $value = EnumString::getValue(EnumString::USER_SUSPENDED);
    expect($value)->toBeString()->toBe(EnumString::USER_SUSPENDED->value);


    $value = EnumString::getValue('USER_SUSPENDED');
    expect($value)->toBe(EnumString::USER_SUSPENDED->value);

    $value = EnumString::getValue('NAME_NOT_EXISTS');
    expect($value)->toBeNull();
});

it('Get array of enum', function () {
    $array = EnumString::toArray();
    expect($array)->toBeArray()
        ->and($array)->toHaveLength(count(EnumString::cases()))
        ->and($array)->toMatchArray([
            EnumString::USER_SUSPENDED->name => EnumString::USER_SUSPENDED->value,
            EnumString::ACTIVE->name => EnumString::ACTIVE->value,
        ]);
});

it('Get json of enum', function () {
    $json = EnumString::toJson();
    expect($json)->toBeJson();
});
