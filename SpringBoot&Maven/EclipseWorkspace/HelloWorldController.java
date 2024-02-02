package com.example.beispielprojekt;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;
public class HelloWorldController {
    @GetMapping(path = "/hello")
    public String hellWorld() {
        return "Hello Leon";
    }

}
