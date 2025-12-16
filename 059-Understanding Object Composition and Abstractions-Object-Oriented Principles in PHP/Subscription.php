<?php

    class Subscription 
    {

        // use Billable;

        public function __construct(
            protected BillingPortal $billingPortal
        ) {
            //
        }

        public function create()
        {

            // interact with a billing provider, like Stripe.
            // get a Stripe customer.
            // det a Stripe subscription.

            $this->billingPortal->getCustomer();

        }

        public function cancel()
        {}
        
        public function swao(string $newPlan)
        {}

        public function invoice()
        {}

    }

    // class BillableSubscription extends Subscription
    // {

    //     protected function getStripeCustomer()
    //     {}

    //     protected function getStripeSubscription()
    //     {}

    // }


    // trait Billable
    // {

    //     protected function getStripeCustomer()
    //     {}

    //     protected function getStripeSubscription()
    //     {}

    // }

    interface BillingPortal
    {

        public function getCustomer();

        public function getSubscription();

    }

    class StripeBillingPortal implements BillingPortal
    {
        public function getCustomer()
        {
            //TODO: Implement getCustomer() method
        }

        public function getSubscription()
        {
            //TODO: Implement getSubscription() method
        }
    }

    class BraintreeBillingPortal implements BillingPortal
    {
        public function getCustomer()
        {
            //TODO: Implement getCustomer() method
        }

        public function getSubscription()
        {
            //TODO: Implement getSubscription() method
        }
    }

    $subscription = new Subscription(
        new BraintreeBillingPortal()
    );

    echo "\n";
    var_dump($subscription);
    echo "\n";