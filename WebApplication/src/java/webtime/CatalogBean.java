package webtime;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.RequestScoped;
import javax.faces.bean.SessionScoped;

@ManagedBean
@SessionScoped
public class CatalogBean implements Serializable {
    
    private String selectedCategory;
    private List<ProductBean> products;
    private List<ProductBean> filteredProducts;

    public CatalogBean(){
        initCatalog();
    }
    
    public CatalogBean(String selectedCategory) {
        this.selectedCategory = selectedCategory;
        initCatalog();
    }
    
    private void initCatalog() {
        products = new ArrayList<>();
        
        products.add(new ProductBean("Komputer 2000", "cat_devices", 3400.41f));
        products.add(new ProductBean("Laptop 2500", "cat_devices", 4300.53f));
        products.add(new ProductBean("Naprawa komputera", "cat_services", 49.99f));
        products.add(new ProductBean("Czyszczenie dysku", "cat_services", 25.99f));
        products.add(new ProductBean("SpotiFive", "cat_software", 399.49f));
        products.add(new ProductBean("NetInBeans", "cat_software", 15.99f));
        products.add(new ProductBean("Ścierka do monitora", "cat_products", 9.99f));
        products.add(new ProductBean("Sprężone powietrze", "cat_products", 19.99f));
    }
    
    public void filter() {
        filteredProducts = new ArrayList<>();
        
        products.stream().filter(product -> (product.category.equals(selectedCategory))).forEachOrdered(product -> {
            filteredProducts.add(product);
        });
    }
    
    public List<ProductBean> getFilteredProducts() {
        return filteredProducts;
    }
    
    public List<ProductBean> getProducts() {
        return products;
    }
     
    public String getSelectedCategory() {
        return selectedCategory;
    }

    public void setSelectedCategory(String selectedCategory) {
        this.selectedCategory = selectedCategory;
    }
    
}
