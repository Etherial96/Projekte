package diminish;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class Buffreader {

	    public static void main(String[] args) {
	        String inputFileName = "Spells.lua";
	        String outputFileName = "steptwo.lua";

	        try {
	            BufferedReader reader = new BufferedReader(new FileReader(inputFileName));
	            BufferedWriter writer = new BufferedWriter(new FileWriter(outputFileName));

	            String line;
	            String wordPart ="";
	            while ((line = reader.readLine()) != null) {
	                // Splitte die Zeile nach " = " und "--" auf
	                String[] parts = line.split(" = ");
	                if (parts.length == 2 && line.contains("[") && !parts[0].contains("-")) {
	                    // Extrahiere die ID und das geschriebene Wort
	                    String idPart = parts[0].trim();
	                    int indexOfDoubleDash = parts[1].indexOf("--");

	                    // Überprüfen, ob "--" im String gefunden wurde
	                    if (indexOfDoubleDash != -1) {
	                        // Extrahieren Sie den Teil nach "--" (einschließlich "--")
	                        wordPart = parts[1].substring(indexOfDoubleDash).trim();
	                        wordPart = wordPart.replace("--", "").trim();
	                        wordPart = wordPart.replace(" ", "");
	                        String[] wordcut = wordPart.split("\\(");

	                        // Der Teil vor der öffnenden Klammer ist der gewünschte String
	                        wordPart = wordcut[0];

	                        System.out.println(wordPart);
	                    }
	                    // Entferne die [ ] aus der ID
	                    String id = idPart.replaceAll("[\\[\\]]", "");
	                    
	                    // Erstelle die Zeile für die Ausgabedatei
	                    /*String stepone = "				[\"debuff>"+wordPart+"\"] = {\r\n"
	                    		+ "					[\"type\"] = \"debuff\",\r\n"
	                    		+ "					[\"spellName\"] = "+parts[0]+",\r\n"
	                    		+ "					[\"color1\"] = {\r\n"
	                    		+ "						[\"a\"] = 1,\r\n"
	                    		+ "						[\"r\"] = 1,\r\n"
	                    		+ "						[\"g\"] = 0.2,\r\n"
	                    		+ "						[\"b\"] = 0.2,\r\n"
	                    		+ "					},\r\n"
	                    		+ "				},";*/
	                    String steptwo = "[\"debuffs-"+wordPart+"\"] = 161,";
	                    /*String stepthree =	"				[\"debuff-"+wordPart+"\"] = {\r\n"
	                    		+ "					[\"type\"] = \"debuff\",\r\n"
	                    		+ "					[\"color1\"] = {\r\n"
	                    		+ "						[\"a\"] = 1,\r\n"
	                    		+ "						[\"b\"] = 0.2,\r\n"
	                    		+ "						[\"g\"] = 0.2,\r\n"
	                    		+ "						[\"r\"] = 1,\r\n"
	                    		+ "					},\r\n"
	                    		+ "					[\"spellName\"] = "+parts[0]+",\r\n"
	                    		+ "				},";*/
	                    // Schreibe die Zeile in die Ausgabedatei
	                    writer.write(steptwo);
	                    writer.newLine();
	                }
	            }

	            // Schließe die Dateien
	            reader.close();
	            writer.close();

	            System.out.println("Verarbeitung abgeschlossen. Ergebnis in " + outputFileName);
	        } catch (IOException e) {
	            e.printStackTrace();
	        }
	    }
	}
