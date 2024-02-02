package com.first.websiteIT;


import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.client.RestTemplate;

@RestController
public class BotController {

    @PostMapping("/sendMessage")
    public String sendMessage(@RequestParam String userMessage) 
    {
        // Hier kannst du die Benutzernachricht verarbeiten
        //System.out.println("Received from user1: " + userMessage);

        // Sende die Benutzernachricht an das Python-Skript
    	// Starte dafür das PythonSkript: chatforSpringBoot.py
        String pythonScriptUrl = "http://host.docker.internal:5002/userMessage";
        userMessage = sendToPythonScript(pythonScriptUrl, userMessage);
        //System.out.println("Received from Bot: " + userMessage);
        return userMessage;
    }

    private String sendToPythonScript(String pythonScriptUrl, String userMessage) {
        // Erstelle HTTP-Header mit JSON Content-Type
        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);

        // Erstelle die Anfrage-Entität mit der Benutzernachricht
        HttpEntity<String> requestEntity = new HttpEntity<>(userMessage, headers);

        // Erstelle RestTemplate
        RestTemplate restTemplate = new RestTemplate();

        // Sende die Anfrage an das Python-Skript
        ResponseEntity<String> responseEntity = restTemplate.postForEntity(pythonScriptUrl, requestEntity, String.class);

        // Verarbeite die Antwort vom Python-Skript, wenn notwendig
        String response = responseEntity.getBody();
        //System.out.println("Received from Bot " + response);
        
        return response;
    }
}