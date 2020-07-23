<?php

/**
 * Problem:
 * https:/leetcode.com/problems/longest-substring-without-repeating-characters/
 * Given a string, find the length of the longest substring without repeating characters.
 *
 * Solution:
 * While we haven't hit the end of the string, check if we've seen the character at the end of our bounds.
 * If we have, forget the character at the start of our bounds, then increment the start of the bounds. 
 * Otherwise, remember that character, increment the end of our bounds, and if this is longer than the best,
 * remember this as the new best.
 *
 */
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $len = strlen($s);
        $start = $end = $best = 0;
        $usedChars = [];
        while($end < $len) {
            $checkChar = $s[$end];
            if(array_key_exists($checkChar, $usedChars)) {
                unset($usedChars[$s[$start++]]);
            } else {
                $usedChars[$checkChar] = $end++;
                $best = max($best, $end - $start);
            }
        }
        return $best;
    }
}
