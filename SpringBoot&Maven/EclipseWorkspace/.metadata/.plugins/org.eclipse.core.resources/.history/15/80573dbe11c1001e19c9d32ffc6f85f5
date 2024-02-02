package com.example.beispielprojekt;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ConfigurableApplicationContext;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Component;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@SpringBootApplication
public class BeispielProjektApplication {

	public interface Gerüst
	{
		public String gerüstbau();
		public static int radzahl = 0;
		public void setRadzahl(int k);
		public int getRadzahl();
	}
	@Component
	@Primary
	public class GerüstbauAuto implements Gerüst
	{
		public int radzahl;
		@Override
		public String gerüstbau()
		{
			return "Gerüstbau für Auto gestartet";
		}
		public int getRadzahl()
		{
			return radzahl;
		}
		public void setRadzahl(int radzahl)
		{
			this.radzahl = radzahl;
		}
	}
	public class GerüstbauMotorrad implements Gerüst
	{
		private String modelname = "";
		public int radzahl;
		
		@Override
		public int getRadzahl()
		{
			return radzahl;
		}
		public void setRadzahl(int radzahl)
		{
			this.radzahl = radzahl;
		}
		public String gerüstbau()
		{
			return modelname;
		}
		public String getModelname()
		{
			return modelname;
		}
		public void setModelname(String modelname)
		{
			this.modelname = modelname;
		}
	}
	@Configuration
	public class GerüstConfiguration {
		@Bean
		@Qualifier("idone")
		
		public GerüstbauMotorrad gerüstbauMotorrad()
		{
			GerüstbauMotorrad gerüstbauMotorrad = new GerüstbauMotorrad();
			gerüstbauMotorrad.setModelname("Audi");
			return gerüstbauMotorrad;
		}
	}
	@RestController
	public class Gerüstwiedergabe {
		@Autowired
		@Qualifier("idone")
		Gerüst startebau;
		
		@GetMapping("/")
	    public String basis() {
	        return startebau.gerüstbau()+"  1";
	    }
	}
	    
		public static void main(String[] args) {
	
		
		ConfigurableApplicationContext applicontext = SpringApplication.run(BeispielProjektApplication.class, args);
		Gerüst gerüstzeigen = applicontext.getBean(Gerüst.class);
		System.out.println(gerüstzeigen.getRadzahl());
		System.out.println("Hier ein: "+gerüstzeigen.gerüstbau());
		gerüstzeigen.setRadzahl(3);
		System.out.println(gerüstzeigen.getRadzahl());
		
		City madrid = new City();
		madrid.setName("Madrid");
		madrid.setCapital(true);
		
		City essen = new City();
		essen.setName("Essen");
		essen.setCapital(false);
		
		CityRepository cityRepository = applicontext.getBean(CityRepository.class);
		System.out.println(madrid.getname());
		System.out.println(essen.getname());
		cityRepository.save(madrid);
		cityRepository.save(essen);
		
		
	}

}
