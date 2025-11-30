<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the users browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'PowerProShop',
            ],
            [
                'parent' => 'testimonials',
                'label' => 'Testimonials-1',
                'description' => 'Shown in the bottom of the home page.',
                'slug' => 'testimonials-1',
                'type' => 'html',
                'value' => "PowerProShop's equipment has completely transformed the way we operate our gym. From strength training machines to cardio equipment, every piece is top-notch. The quality and durability of the products are unmatched. Not only has it improved our overall gym environment, but it has also boosted our member satisfaction. The products are easy to use, and we can count on them for years to come. The customer support we received when purchasing was also exceptional, guiding us through every step of the process. We couldn't be happier!"
            ],
            [
                'parent' => 'testimonials',
                'label' => 'Testimonials-2',
                'description' => 'Shown in the bottom of the home page.',
                'slug' => 'testimonials-2',
                'type' => 'html',
                'value' => "I have been using equipment from PowerProShop for the last year and I have to say, the difference it has made in my gym is unbelievable. The quality is superb, and the wide range of machines means that my clients have everything they need for a complete workout. Whether it's strength, cardio, or flexibility, PowerProShop provides the best equipment on the market. The installation team was quick and efficient, and they ensured everything was set up perfectly. I highly recommend PowerProShop to anyone looking for reliable and high-quality gym equipment!"
            ],
            [
                'parent' => 'testimonials',
                'label' => 'Testimonials-3',
                'description' => 'Shown in the bottom of the home page.',
                'slug' => 'testimonials-3',
                'type' => 'html',
                'value' => "From the moment I reached out to PowerProShop, I knew I was making the right decision. The team was incredibly knowledgeable and helped me choose the perfect equipment for my needs. They took into account the space available and even suggested the most effective equipment for my specific fitness goals. Their after-sales service has been outstanding too. Anytime I had questions, they responded promptly and ensured everything was working smoothly. I'm extremely satisfied with my purchase and would definitely recommend them to anyone in need of high-quality gym gear."
            ],
            [
                'parent' => 'home',
                'label' => 'About Content',
                'description' => 'The About section shown in the home page.',
                'slug' => 'about-content',
                'type' => 'html',
                'value' => '<p class="text-white-50">
                    Our Story
                    We began as a family-owned business with a shared passion for fitness.
                    We discovered common challenges faced by both gym operators and fitness enthusiasts.
                    To address these issues, we built a strong network of suppliers,
                    ensuring access to the latest and best equipment to support gyms and their communities.</a>
                    The theme is open source, and you can use it for any purpose, personal or commercial.
                </p>',
            ],
            [
                'parent' => 'faq',
                'label' => 'FAQ-2',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-2',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 1',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q1',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 2',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q2',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 3',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q3',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 4',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q4',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 5',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q5',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 6',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q6',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 7',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q7',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 8',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q8',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 9',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q9',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section',
                'label' => 'FAQ question 10',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-q10',
                'type' => 'text',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 1',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a1',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 2',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a2',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 3',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a3',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 4',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a4',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 5',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a5',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 6',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a6',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 7',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a7',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 8',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a8',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 9',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a9',
                'type' => 'html',
                'value' => '',
            ],
            [
                'parent' => 'FAQ section answer',
                'label' => 'FAQ answer 10',
                'description' => 'The FAQ section that is displayed on the FAQ page',
                'slug' => 'faq-a10',
                'type' => 'html',
                'value' => '',
            ],

        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
