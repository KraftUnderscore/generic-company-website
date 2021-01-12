package webtime;
import java.util.HashMap;
import java.util.Map;
import java.io.Serializable;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;

@ManagedBean
@RequestScoped
public class FormBean implements Serializable {

	private static final long serialVersionUID = 1715935052239888761L;
	private Map<String,String> gender_map;
        private String name;
	private String surname;
	private String email;
	private String phone;
	private String gender;
        private String subject;

	public FormBean() {
	}

    public FormBean(String name, String surname, String email, String phone, String gender, String subject) {
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.phone = phone;
        this.gender = gender;
        this.subject = subject;
        
        this.gender_map = new HashMap<>();
        this.gender_map.put("male", "Pan");
        this.gender_map.put("female","Pani");
        
    }
    
    public Map<String, String> getGenderMap() {
        return gender_map;
    }

    public String getSubject() {
        return subject;
    }

    public void setSubject(String subject) {
        this.subject = subject;
    }

    
    
    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    
    

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }
        
        

}