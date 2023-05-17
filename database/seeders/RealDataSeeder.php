<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RealDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        File::copyDirectory(database_path('seeders/storage'), public_path('storage'));

        $authors = $this->createAuthors();
        $this->createBooks($authors);
    }

    private function createAuthors(): Collection
    {
        return Author::factory()->forEachSequence(
            ['name' => 'George Orwell', 'avatar' => '/authors/george-orwell.jpeg'],
            ['name' => 'Jane Austen', 'avatar' => '/authors/jane-austen.jpeg'],
            ['name' => 'Ernest Hemingway', 'avatar' => '/authors/ernest-hemingway.jpeg'],
            ['name' => 'J. R. R. Tolkien', 'avatar' => '/authors/j-r-r-tolkien.jpeg'],
        )->create();
    }

    private function createBooks(Collection $authors): Collection
    {
        [$george, $jane, $ernest, $jrr] = $authors;

        return Book::factory()->forEachSequence(
            ['title' => '1984', 'author_id' => $george, 'cover' => '/covers/1984.jpeg'],
            ['title' => 'Animal Farm', 'author_id' => $george, 'cover' => '/covers/animal-farm.jpeg'],
            ['title' => 'Politics and the English Language', 'author_id' => $george, 'cover' => '/covers/politics-and-the-english-language.jpeg'],
            ['title' => 'Pride & Prejudice', 'author_id' => $jane, 'cover' => '/covers/pride-and-prejudice.jpeg'],
            ['title' => 'Emma', 'author_id' => $jane, 'cover' => '/covers/emma.jpeg'],
            ['title' => 'Persuasion', 'author_id' => $jane, 'cover' => '/covers/persuasion.jpeg'],
            ['title' => 'Sense & Sensibility', 'author_id' => $jane, 'cover' => '/covers/sense-and-sensibility.jpeg'],
            ['title' => 'The Old Man and the Sea', 'author_id' => $ernest, 'cover' => '/covers/the-old-man-and-the-sea.jpeg'],
            ['title' => 'For Whom the Bell Tolls', 'author_id' => $ernest, 'cover' => '/covers/for-whom-the-bell-tolls.jpeg'],
            ['title' => 'A Farewell to Arms', 'author_id' => $ernest, 'cover' => '/covers/a-farewell-to-arms.jpeg'],
            ['title' => 'The Killers', 'author_id' => $ernest, 'cover' => '/covers/the-killers.jpeg'],
            ['title' => 'The Lord of the Rings', 'author_id' => $jrr, 'cover' => '/covers/the-lord-of-the-rings.jpeg'],
            ['title' => 'The Hobbit', 'author_id' => $jrr, 'cover' => '/covers/the-hobbit.png'],
            ['title' => 'The Fellowship of the Ring', 'author_id' => $jrr, 'cover' => '/covers/the-fellowship-of-the-ring.jpeg'],
            ['title' => 'The Two Towers', 'author_id' => $jrr, 'cover' => '/covers/the-two-towers.jpeg'],
        )->recycle(Publisher::all())->create();
    }
}
