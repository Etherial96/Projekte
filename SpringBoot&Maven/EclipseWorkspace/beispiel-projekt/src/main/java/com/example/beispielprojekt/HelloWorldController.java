package com.example.beispielprojekt;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HelloWorldController {
    @GetMapping("/hello")
    public String hellWorld() {
        return "Hello Leons";
    }

}
