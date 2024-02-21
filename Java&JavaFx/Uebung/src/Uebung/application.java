package Uebung;

public class application 
{

	public static void main(String[] args) 
	{
		
        Haus meinHaus = new Haus(1);
  
        meinHaus.einzug("Mustermann", new String[]{"Max", "Maria","Andreas"}, 0, 4);
        meinHaus.einzug("Schmidt", new String[]{"Anna", "Peter"}, 0, 1);
        
        ausgabeAnsprechpartner(meinHaus);
	}
	public static void ausgabeAnsprechpartner(Haus haus) 
	{
        Familie[] bewohner = haus.getBewohner();

        System.out.println("Ansprechpartner im Haus:");
        for (Familie familie : bewohner) 
        {
            if (familie != null) {
                int ansprechpartnerIndex = familie.getAnsprechpartner();
                String familienname = familie.getFamilienname();
                String ansprechpartnerVorname = familie.getVornamen()[ansprechpartnerIndex];

                System.out.println(familienname + ": " + ansprechpartnerVorname);
            }
        }
	}
}
