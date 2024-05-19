<?php

namespace Database\Factories;

use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $url = $this->getUrl('post');
        $mime = $this->getMime($url);

        return [
            'url' => $url,
            'mime' => $mime,
            'mediable_id' => Post::factory(),
            'mediable_type' => function (array $attributes) {
                return Post::find($attributes['mediable_id'])->getMorphClass();
            }
        ];

    }

    function getUrl($type = 'post'): string
    {
        switch ($type) {
            case 'post':

                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    'https://images.unsplash.com/photo-1715645943748-a7cf8a81f1ef?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyOHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1715588561967-6d413b6690bf?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ];

                return $this->faker->randomElement(array: $urls);

                break;
            case 'reel':

                $urls = [
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                    'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4'
                ];

                return $this->faker->randomElement(array: $urls);

                break;

            default:

                break;
        }
    }

    function getMime($url): string
    {
        if (str()->contains(needles: $url, ignoreCase: 'gtv-videos-bucket')) {
            return 'video';
        } elseif (str()->contains(needles: $url, ignoreCase: 'images.unsplash.com')) {
            return 'image';
        }
    }

    // chainable method
    function reel(): Factory
    {
        $url = $this->getUrl(type: 'reel');
        $mime = $this->getMime(url: $url);

        return $this->state(function (array $attributes) use ($url, $mime) {

            return [
                'mime' => $mime,
                'url' => $url,

            ];
        });
    }

    // chainable method
    function post(): Factory
    {
        $url = $this->getUrl(type: 'post');
        $mime = $this->getMime(url: $url);

        return $this->state(function (array $attributes) use ($url, $mime) {

            return [
                'mime' => $mime,
                'url' => $url,

            ];
        });
    }



}
