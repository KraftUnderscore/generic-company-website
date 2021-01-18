package webtime;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.ViewScoped;

@ManagedBean
@ViewScoped
public class CatalogBean implements Serializable {
    
    private String selectedCategory = "cat_all";

    private List<ProductBean> products;

    private List<ProductBean> filteredProducts;
    private List<ProductBean> selectedProducts;

    @ManagedProperty("#{cartBean}")
    private CartBean cart;

    
    public CatalogBean(){
        initCatalog();
    }
    
    public CatalogBean(String selectedCategory) {
        this.selectedCategory = selectedCategory;
        initCatalog();
    }
        
    private void initCatalog() {
        products = new ArrayList<>();
        
        products.add(new ProductBean("Komputer Samsung", "cat_devices", 3400.41f));
        products.add(new ProductBean("Laptop HP", "cat_devices", 4300.53f));
        products.add(new ProductBean("Laptop Lenovo", "cat_devices", 3788.89f));
        products.add(new ProductBean("Telefon Samsung", "cat_devices", 4500.01f));
        products.add(new ProductBean("Telefon Apple", "cat_devices", 7888.88f));
        products.add(new ProductBean("Naprawa komputera", "cat_services", 49.99f));
        products.add(new ProductBean("Czyszczenie dysku", "cat_services", 25.99f));
        products.add(new ProductBean("Wymiana pasty termicznej", "cat_services", 15.99f));
        products.add(new ProductBean("Zbudowanie komputera", "cat_services", 50.00f));
        products.add(new ProductBean("Podłączenie routera", "cat_services", 59.99f));
        products.add(new ProductBean("SpotiFive", "cat_software", 399.49f));
        products.add(new ProductBean("NetInBeans", "cat_software", 15.99f));
        products.add(new ProductBean("Virtual Studio Coding", "cat_software", 199.99f));
        products.add(new ProductBean("Notepad#", "cat_software", 3.99f));
        products.add(new ProductBean("CableShark", "cat_software", 17.50f));
        products.add(new ProductBean("Ścierka do monitora", "cat_products", 9.99f));
        products.add(new ProductBean("Podkładka pod myszkę", "cat_products", 39.99f));
        products.add(new ProductBean("Kabel HDMI", "cat_products", 69.99f));
        products.add(new ProductBean("Piłeczka antystresowa", "cat_products", 2.99f));
        products.add(new ProductBean("Sprężone powietrze", "cat_products", 19.99f));
        
        filteredProducts = products;
    }

    public void addSelected() {
        selectedProducts.forEach(prod ->{
            if(!cart.containsProduct(prod)) {
                cart.cartProducts.add(prod);
            }
        });
    }
    
    public void removeSelected() {
        selectedProducts.forEach(prod ->{
            if(cart.containsProduct(prod)) {
                cart.removeProduct(prod);
            }
        });
    }
    
    public void filter() {
        if(selectedCategory.equals("cat_all")) {
            filteredProducts = products;
            return;
        }
        filteredProducts = new ArrayList<>();
        
        products.stream().filter(product -> 
                (product.category.equals(selectedCategory)))
                .forEachOrdered(product -> {
            filteredProducts.add(product);
        });
    }
    
    public List<ProductBean> getFilteredProducts() {
        return filteredProducts;
    }
    
    public List<ProductBean> getProducts() {
        return products;
    }
    
    public CartBean getCart() {
        return cart;
    }

    public String getSelectedCategory() {
        return selectedCategory;
    }

    public void setSelectedCategory(String selectedCategory) {
        this.selectedCategory = selectedCategory;
    }
    
    public List<ProductBean> getSelectedProducts() {
        return selectedProducts;
    }

    public void setSelectedProducts(List<ProductBean> selectedProducts) {
        this.selectedProducts = selectedProducts;
    }

    public void setCart(CartBean cart) {
        this.cart = cart;
    }
}
