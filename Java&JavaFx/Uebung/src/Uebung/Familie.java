package Uebung;

public class Familie {
	private String familienname;
	private String[] vornamen;
	private int ansprechpartner;
	
	public Familie(String familienname, int anzahl)
	{
		this.familienname = familienname;
		this.vornamen = new String[anzahl];
	}
	void setFamilienname(String familienname)
	{
		this.familienname = familienname;
	}
	void setVornamen(String[] vornamen)
	{
		this.vornamen = vornamen;
	}
	void setAnsprechpartner(int ansprechpartner)
	{
		this.ansprechpartner = ansprechpartner;
	}
	public String getFamilienname()
	{
		return this.familienname;
	}
	public String[] getVornamen()
	{
		return this.vornamen;
	}
	public int getAnsprechpartner()
	{
		return this.ansprechpartner;
	}
}
