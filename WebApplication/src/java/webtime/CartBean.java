package webtime;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean
@SessionScoped
public class CartBean implements Serializable{
    public List<ProductBean> cartProducts = new ArrayList<>();

    public CartBean() {}
    
    public List<ProductBean> getCartProducts() {
        return cartProducts;
    }

    public void setCartProducts(List<ProductBean> cartProducts) {
        this.cartProducts = cartProducts;
    }    
    
    public boolean containsProduct(ProductBean product) {
        return cartProducts.stream().anyMatch(prod -> (prod.name.equals(product.name)));
    }
    
    public void removeProduct(ProductBean product) {
        for(ProductBean prod : cartProducts) {
            if(prod.name.equals(product.name)) {
                cartProducts.remove(prod);
                break;
            }
        }
    }
    
    public float getPrice(){
        if (cartProducts.isEmpty())
                return 0;
        else{
            float price = 0;
            price = cartProducts.stream().map(p -> p.getPrice()).reduce(price, (accumulator, _item) -> accumulator + _item);
            return price;
        }
    }
    
    public void wipeCart(){
        cartProducts.clear();
    }
}
