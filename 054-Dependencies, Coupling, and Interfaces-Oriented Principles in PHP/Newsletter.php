<?php

    class User 
    {
        public string $email = 'test@example.com';
        public bool $subscribed = false;
        public function update(array $data): void
        {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    class Newsletter
    {

        public function __construct(public NewsletterProvider $provider)
        {
            //
        }

        public function subscribe(User $user): bool
        {

            $this->provider->addToList('default-list-id', $user->email);
            
            // Update the user und mark them as subscribed
            $user->update(['subscribed' => true]);

            return true;
        }

    }

    interface NewsletterProvider
    {
        public function addToList(string $list, string $email): void;
    }

    class CampaignMonitorProvider implements NewsletterProvider
    {

        public function addToList(string $list, string $email): void  
        {
            // interact with CampaignMonitor. Dummy code below
            // $cm =new CampaignMonitorAPI();

            // $cm->addApiKey('your-api-key');

            // $list = $cm->list->find($list);

            // $list->addToList($email);
        }

    }

    class PostmarkProvider implements NewsletterProvider
    {

        public function addToList(string $list, string $email): void  
        {
            // interact with Postmark. Dummy code below 
            // $pm = new PostmarkAPI('your-api-key');

            // $pm->lists->addSubscriber($list, $email);
        }

    }

    $newsletter = new Newsletter(
        new PostmarkProvider()
    );

    $newsletter->subscribe(new User());