package webtime;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean
@SessionScoped
public class ProductBean {

    public String name;
    public String category;
    public float price;
    
    public ProductBean() {}
    
    public ProductBean(String name, String category, float price) {
        this.name = name;
        this.category = category;
        this.price = price;
    }
        
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public float getPrice() {
        return price;
    }

    public void setPrice(float price) {
        this.price = price;
    }
}
