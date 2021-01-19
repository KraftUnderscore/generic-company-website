package webtime;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ManagedProperty;
import javax.faces.bean.SessionScoped;

@ManagedBean(name = "orderBean")
@SessionScoped
public class OrderBean implements Serializable {
    

    private List<ShipmentBean> shipmentOptions;
    private List<String> paymentOptions;
    
    private ShipmentBean chosenShipment;
    private String chosenPayment;
    private String shipment_name;
    private float price;

    @ManagedProperty("#{cartBean}")
    private CartBean cart;
    
    public OrderBean(){
        initCatalog();
    }

        
    private void initCatalog() {
        shipmentOptions = new ArrayList<>();
        paymentOptions = new ArrayList<>();
        
        shipmentOptions.add(new ShipmentBean("Kurier",9.99f));
        shipmentOptions.add(new ShipmentBean("Paczkomat",5.99f));
        shipmentOptions.add(new ShipmentBean("Odbiór osobisty",0.99f));
        
        paymentOptions.add("Przelew bankowy");
        paymentOptions.add("BLIK");
        
        chosenPayment = null;
        chosenShipment = null;
        
        if(cart != null)
            price = cart.getPrice();
        else
            price = 0;
    }

    public String getShipment_name() {
        return shipment_name;
    }

    public void setShipment_name(String shipment_name) {
        this.shipment_name = shipment_name;
    }

    
    public List<ShipmentBean> getShipmentOptions() {
        return shipmentOptions;
    }

    public void setShipmentOptions(List<ShipmentBean> shipmentOptions) {
        this.shipmentOptions = shipmentOptions;
    }

    public List<String> getPaymentOptions() {
        return paymentOptions;
    }

    public void setPaymentOptions(List<String> paymentOptions) {
        this.paymentOptions = paymentOptions;
    }

    public ShipmentBean getChosenShipment() {
        return chosenShipment;
    }

    public void setChosenShipment(ShipmentBean chosenShipment) {
        this.chosenShipment = chosenShipment;
    }

    public String getChosenPayment() {
        return chosenPayment;
    }

    public void setChosenPayment(String chosenPayment) {
        this.chosenPayment = chosenPayment;
    }

    public CartBean getCart() {
        return cart;
    }

    public void setCart(CartBean cart) {
        this.cart = cart;
    }
    

    public float getPrice() {
        return price;
    }

    public void setPrice(float price) {
        this.price = price;
    }

    public void changePrice(){
        if (chosenShipment != null)
            price = chosenShipment.getShipment_prize() + cart.getPrice();
    }
    
    public void constructChosenShipment(){
        if(this.shipment_name != null){
            for(ShipmentBean s: this.shipmentOptions){
                if(s.shipment_name.equals(this.shipment_name)){
                    this.chosenShipment = s;
                    this.changePrice();
                    break;
                }
            }
        }
    }
    
    public float getActualPrice(){
        if (chosenShipment != null)
            price = chosenShipment.getShipment_prize() + cart.getPrice();
        else
            price = cart.getPrice();
        return price;
    }
    
    public boolean isEverythingSet(){
        return chosenShipment != null && chosenPayment != null && cart.cartProducts.size() > 0;
    }
    
    public String actionString(){
        this.cart.wipeCart();
        return "/index.xhtml";
    }
}
