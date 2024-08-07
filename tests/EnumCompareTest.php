<?php

it('compare enum string', function () {
    $status = EnumString::ACTIVE;

    expect($status->is('active'))->toBeTrue()
        ->and($status->is(EnumString::active()))->toBeTrue()
        ->and($status->is(EnumString::USER_SUSPENDED))->toBeFalse();
});

it('compare enum int', function () {
    $status = EnumInt::ACTIVE;

    expect($status->is('1'))->toBeFalse()
        ->and($status->is('1', false))->toBeTrue()
        ->and($status->is(1))->toBeTrue()
        ->and($status->is(EnumInt::ACTIVE))->toBeTrue();
});

it('compare enum unit', function () {
    $status = EnumUnit::ACTIVE;

    expect($status->is('active'))->toBeFalse()
        ->and($status->is('ACTIVE'))->toBeTrue()
        ->and($status->is(EnumUnit::ACTIVE))->toBeTrue();
});
