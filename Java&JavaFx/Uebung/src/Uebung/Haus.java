package Uebung;

public class Haus{
	
	private String strasse;
	private Familie[] bewohner;
	private int hausnr;
	
	public Haus(int hausnr)
	{
		this.hausnr = hausnr;
		this.strasse = "Marktstrasse";
		this.bewohner = new Familie[6];
	}
	public Familie[] getBewohner()
	{
		return bewohner;
	}
	public void einzug(String familienname, String[] vornamen, int ansprechpartner, int etage) {
        if (etage >= 0 && etage < bewohner.length) {
            // Erstellen einer neuen Familie
            Familie neueFamilie = new Familie(familienname, vornamen.length);
            neueFamilie.setVornamen(vornamen);
            neueFamilie.setAnsprechpartner(ansprechpartner);

            // Familie in die gewünschte Etage einziehen lassen
            bewohner[etage] = neueFamilie;
        } else {
            System.out.println("Ungültige Etage für den Einzug.");
        }
    }
}
