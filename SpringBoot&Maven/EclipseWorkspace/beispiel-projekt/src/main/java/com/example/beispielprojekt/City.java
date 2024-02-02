package com.example.beispielprojekt;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "cities")
public class City {
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;
	private String name;
	
	private boolean isCapital;
	
	public Long getid()
	{
		return id;
	}
	public void setid(Long id)
	{
		this.id = id;
	}
	public String getname()
	{
		return name;
	}
	public void setName(String name)
	{
		this.name = name;
	}
	public boolean isCapital() {
		return isCapital;
	}
	public void setCapital(boolean isCapital) {
		this.isCapital = isCapital;
	}
}
