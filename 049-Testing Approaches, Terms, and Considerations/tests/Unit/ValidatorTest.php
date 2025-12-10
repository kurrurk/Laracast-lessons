<?php

    use Core\Validator;

    it('validates a string', function () {

        expect(Validator::string('hello'))->toBeTrue();
        expect(Validator::string(false))->toBeFalse();
        expect(Validator::string(''))->toBeFalse();

    });

    it('validates a string with a minimum length', function () {

        expect(Validator::string('hello', 20))->toBeFalse();

    });

    it('validates an email', function () {

        expect(Validator::email('hello'))->toBeFalse();
        //expect(Validator::email('hello@gmail.com'))->toEqual('hello@gmail.com'); // filter_var returns the email if it's valid
        expect(Validator::email('hello@gmail.com'))->toBeTrue();

    });

    it('validates that a number is greater than a given amount', function () {

        expect(Validator::greaterThan(10, 5))->toBeTrue();
        expect(Validator::greaterThan(10, 15))->toBeFalse();
        
    });