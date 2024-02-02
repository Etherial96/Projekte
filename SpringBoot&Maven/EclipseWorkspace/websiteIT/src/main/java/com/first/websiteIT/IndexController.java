package com.first.websiteIT;

import org.springframework.core.io.Resource;
import org.springframework.core.io.ResourceLoader;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.io.IOException;
import java.util.Objects;

@RestController
@RequestMapping("/")
public class IndexController {

    private final ResourceLoader resourceLoader;

    public IndexController(ResourceLoader resourceLoader) {
        this.resourceLoader = resourceLoader;
    }

    @GetMapping(value = "/index", produces = MediaType.TEXT_HTML_VALUE)
    public ResponseEntity<String> getIndexHtml() throws IOException {
        // Lade die index.html-Datei als Resource
        Resource resource = resourceLoader.getResource("classpath:templates/index.html");

        // Überprüfe, ob die Datei existiert
        if (resource.exists()) {
            // Lese den Inhalt der Datei und gebe ihn zurück
            String content = new String(Objects.requireNonNull(resource.getInputStream().readAllBytes()));
            return ResponseEntity.ok(content);
        } else {
            return ResponseEntity.notFound().build();
        }
    }
}