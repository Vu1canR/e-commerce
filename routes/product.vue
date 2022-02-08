<template>
    <div>
        <div class="top-nav">
            <div class="tpcl">
                <div class="preview-div">
                    <img
                        :src="
                            '/images/' +
                                product_object.sub_category_id +
                                '/' +
                                expandImg
                        "
                        alt="In progress"
                        class="expandImg"
                    />
                </div>
                <div class="im-div">
                    <div class="p-images-row">
                        <div
                            class="column"
                            @mouseover="imgPreview(image)"
                            v-for="(image, index) in images"
                            :key="index"
                        >
                            <img
                                class="pic-min"
                                :src="
                                    '/images/' +
                                        product_object.sub_category_id +
                                        '/' +
                                        image
                                "
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="tpcr">
                <div>
                    <div>
                        <div>
                            <h1>{{ product_object.name }}</h1>
                        </div>
                        <div class="review"></div>
                    </div>
                    <div>
                        <div class="p-code man">
                            manu.: Sony| product code: 711719407775 / SONY|
                            store code: {{ product_object.store_code }}
                        </div>
                    </div>
                </div>
                <br />
                <div class="order-div">
                    <div class="odl">
                        <ul>
                            <li
                                class="p-spec"
                                v-for="(line, index) in desc"
                                :key="index"
                                v-text="line"
                            ></li>
                        </ul>
                    </div>
                    <div class="odr">
                        <div class="pbb-div">
                            <div class="pr-div">
                                <h1 class="price">
                                    {{ product_object.price }}TJS
                                </h1>
                            </div>
                            <div class="sb-div">
                                <div class="q-selector">
                                    <select
                                        name="quanity"
                                        v-model="quantity"
                                        @click="drdown = !drdown"
                                        @blur="drdown = false"
                                        :class="
                                            drdown ? 'is-active' : 'not-active'
                                        "
                                    >
                                        <option
                                            v-for="index in 9"
                                            :key="index"
                                            :value="index"
                                            v-text="index"
                                        ></option>
                                    </select>
                                </div>
                                <div class="add-div">
                                    <button
                                        v-if="inCart()"
                                        @click="inCart()"
                                        class="b-btn"
                                    >
                                        <a href="/cart">Move to cart</a>
                                    </button>
                                    <button
                                        v-else
                                        class="b-btn"
                                        type="submit"
                                        @click.prevent="addItem()"
                                    >
                                        Add to cart
                                    </button>
                                </div>
                                <div class="in-store">
                                    <span class="stock">In stock</span>
                                </div>
                                <div class="sh-div">
                                    <span class="shipping">Free shipping</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div>
            <div>
                <!-- <tabs>
                    <tab name="About" :selected="true" id="werwear">
                        <h2>Best selling console of all time</h2>

                    </tab>
                    <tab name="Specifications">
                        <h2>Specifications:</h2>
                        <table class="specs-table">
                            <tr
                                v-for="spec in product_object.specs"
                                :key="spec.id"
                            >
                                <td>{{ spec.property }}</td>
                                <td>{{ spec.pivot.value }}</td>
                            </tr>
                        </table>

                    </tab>
                    <tab name="Reviews">
                        <h2>This world is not my home</h2>
                    </tab>
                    <tab name="Comments">
                        <section class="comments">
                            <br>
                            <div>
                                <ul class="com-list">
                                    <li v-for="(comment, index) in comments" class="comments-list" :key="comment.id">
                                        <div class="user-div">
                                            <div class="profile-pic">
                                                <img v-if="comment.user.picture ==''" src="/images/profile-pictures/dragon.png" alt="picture" height="60" width="60" >
                                                <img v-else :src="'/images/profile-pictures/' + comment.user.picture" alt="picture" height="60" width="60" style="border-radius: 50%;">
                                            </div>

                                            <div class="user-name">
                                                {{ comment.user.name }}
                                            </div>
                                        </div>
                                        <div class="comment-div" v-show="!showEdit[index].editing">
                                            <div class="datetime">
                                                {{ comment.created_at }}
                                            </div>
                                            <div class="comment-rate">&#9734;&#9733;</div>
                                            <div class="comment-body">
                                                {{ comment.body }}
                                            </div>
                                            
                                        </div>
                                        <div class="quote-edit" v-show="!showEdit[index].editing">
                                            <span>Quote</span>
                                            <span v-if="isLogged(comment.user_id)" @click="editComment(index)">Edit</span>
                                        </div>
                                        <div v-show="showEdit[index].editing" class="cedit-div">
                                            <form :action="'/p/' + product_object.id" method="post">
                                            <input type="hidden" name="_token" :value="csrf">
                                            <input type="hidden" name="_method" value="put">
                                                <textarea v-model="comment_body" name="update" cols="105" rows="10"></textarea>
                                            <div class="ec-div">
                                                <button class="ec-btn" @click.prevent="endEditing(comment.id, index)">Save</button><button class="ec-btn" @click.prevent="cancelEditing(index)">Cancel</button>
                                            </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>

                                <p v-if="user == null">
                                    Login to leave a comment
                                </p>
                                <form v-else :action="'/p/' + product_object.store_code + '-' + product_object.id" method="post">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <textarea name="body" cols="30" rows="10">
                                    </textarea>
                                    <button class="add-comment">
                                        Add comment
                                    </button>
                                </form>
                            </div>
                        </section>
                    </tab>
                </tabs> -->
                <tabs v-model="active">
                    <tab title="A">Content A</tab>
                    <tab title="B">Content B</tab>
                    <tab title="C">Content C</tab>
                </tabs>
            </div>
            <br>
        </div>

        <br>
            <p v-bind="inConsole()"></p>
    </div>
</template>
<script>

import cart from "./cart";
import tab from "./tab";
import tabs from "./tabs";
import { ref } from "vue";

export default {
    name: "product",
    components: {
        cart, tab, tabs
    },

    setup() {
        const active = ref(0);

        return { active };
    },

    props: {
        product_object: {
            // required:true
        },
        product_comments: {}
    },
    data() {
        return {
            comments: this.product_comments,
            cart: [],
            quantity: 1,
            drdown: false,
            bradius: "",
            images: this.product_object["images"].split("|"),
            expandImg: "",
            desc: this.product_object["description"].split("\n"),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            user: window.laravel.auth,
            tabs: [],
            selected: false,
            comment_body: '',
            showEdit: [],
            temp: {}

        };
    },
    methods: {
        isLogged(user_id){
            if (this.user != null)
                    return this.user.id == user_id
            

        },
        inCart() {
            for (let i = 0; i < this.cart.length; i++) {
                if (this.cart[i].name == this.product_object["name"])
                    return true;
            }
            return false;
        },

        inConsole() {
            console.log(this.cart)
        },
        imgPreview(image_name) {
            this.expandImg = image_name;
        },

        addItem() {
            this.emitter.emit("addProduct", {
                store_code: this.product_object["store_code"],
                name: this.product_object["name"],
                quantity: this.quantity,
                price: this.product_object["price"]
            });

            console.log('passed previous')
            this.temp.store_code = this.product_object["store_code"];
            this.temp.name = this.product_object["name"];
            this.temp.quantity = this.quantity;
            this.temp.price = this.product_object["price"];
            this.cart.push(this.temp);
            this.temp = {};
        },
        editComment(index){
            this.showEdit[index].editing = true
        },
        endEditing(commentId, index){
            this.showEdit[index].editing = false
            if (this.comment_body != ''){
                axios({
                    method: "put",
                    url: "/p/comment-update",
                    data: {
                        body: this.comment_body,
                        id: commentId
                    }
                })
                .then(response => this.comments[index].body = response.data.body)
                .catch(error => console.log(error));
            }
            
        },
        cancelEditing(index){
            this.showEdit[index].editing = false
        },

    },

    created() {
        this.expandImg = this.images[0];
        
        this.product_comments.forEach(product =>{
            this.showEdit.push({editing: false})
        })
    },
    computed: {
        isEmpty() {
            return this.cart.length;
        }
    },

    mounted() {
        // this.tabs = document.getElementsByClassName("asrc")[0].children;
        if (localStorage.getItem("cart") != null) {
            this.cart = JSON.parse(localStorage.getItem("cart"));
        }
    },

    watch: {
        cart(val) {
            this.inCart();
        }
    }
};
</script>
<style></style>
