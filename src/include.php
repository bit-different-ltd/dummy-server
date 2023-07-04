<?php
    

    function purge(string $string): string{
        return str_replace(array(".", "/", "\\"), "", $string);
    }

    function isValidResponseType(string $type): bool{
        if (file_exists("response/" . purge($type))) return true;
        return false;
    }

    $motivational_lines = array(
        "Together we're stronger.",
        "Family gets it done.",
        "Safety's safe together.",
        "Dreams and teams work together.",
        "Unified we succeed.",
        "There's a \"U\" in success.",
        "Together we define.",
        "Believe in the team.",
        "Teams build dreams.",
        "We can do this together.",
        "Work together, dream together.",
        "Together, we're all experts.",
        "Our best is your best.",
        "The dream makes the difference.",
        "We're united and strong.",
        "Build more together.",
        "Together we can go higher.",
        "We're all better than one.",
        "Mountains move for a determined team.",
        "Let's be great together.",
        "Teams make dreams and more.",
        "Don't believe in just yourself, believe in your team.",
        "Unity is strength and more.",
        "Teams build what can weather storms.",
        "A good team is a greater action.",
    );

    function getMotivation(): string{
        global $motivational_lines;
        return $motivational_lines[rand(0, count($motivational_lines)-1)];
    }