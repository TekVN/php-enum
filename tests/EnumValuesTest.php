<?php

it('Get values of enum', function () {
    $value = EnumInt::getValues();
    expect($value)->toBeArray()->toBe([0, 1]);

    $value = EnumUnit::getValues();
    expect($value)->toBeArray()->toBe([null, null]);

    $value = EnumString::getValues();
    expect($value)->toBeArray()->toBe(['suspend', 'active']);
});