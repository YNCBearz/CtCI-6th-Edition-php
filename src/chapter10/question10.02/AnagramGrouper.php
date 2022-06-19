<?php

class AnagramGrouper
{

    public function groupAnagrams(array $words)
    {
        $result = [];

        foreach ($words as $index => $word) {
            if (!isset($words[$index])) {
                continue;
            }
            $divides = self::divideIntoGroups($words, $index);

            $sameGroupwords = $divides['same_group_words'];
            $result = array_merge($result, $sameGroupwords);

            $sameGroupwordIndexes = $divides['same_group_word_indexes'];
            foreach ($sameGroupwordIndexes as $sameGroupwordIndex) {
                unset($words[$sameGroupwordIndex]);
            }
        }

        return $result;
    }

    private function divideIntoGroups(array $words, int $targetIndex): array
    {
        $sameGroupwords = [];
        $sameGroupwordIndexes = [];

        $targetWord = $words[$targetIndex];
        $targetCharacterCounts = $this->getCharacterCounts($targetWord);

        foreach ($words as $index => $currentWord) {
            if ($index == $targetIndex) {
                $sameGroupwords[] = $targetWord;
                $sameGroupwordIndexes[] = $index;
                continue;
            }

            $currentCharacterCounts = $this->getCharacterCounts($currentWord);

            if ($currentCharacterCounts == $targetCharacterCounts) {
                $sameGroupwords[] = $currentWord;
                $sameGroupwordIndexes[] = $index;
            }
        }

        return [
            'same_group_words' => $sameGroupwords,
            'same_group_word_indexes' => $sameGroupwordIndexes,
        ];
    }

    private function initCharcterCounts(): array
    {
        return [
            'a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0,
            'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0,
            'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0,
            's' => 0, 't' => 0, 'u' => 0, 'v' => 0, 'w' => 0, 'x' => 0,
            'y' => 0, 'z' => 0
        ];
    }

    private function getCharacterCounts(string $word): array
    {
        $charcterCounts = $this->initCharcterCounts();
        $characters = str_split($word);

        foreach ($characters as $character) {
            $charcterCounts[$character]++;
        }

        return $charcterCounts;
    }
}
